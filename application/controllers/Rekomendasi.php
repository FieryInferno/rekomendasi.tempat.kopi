<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekomendasi extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->level) {
            redirect('login');
        }
    }

	public function index()
	{
        $this->RatingModel->set('idUser', $this->session->idUser);
        $ratingUserLogin    = $this->RatingModel->getByUser();
        if ($ratingUserLogin) {
            $user           = $this->UserModel->get();
            $tempatNgopi    = $this->TempatModel->get();
            $matrix         = [];
            for ($i=0; $i < count($tempatNgopi); $i++) { 
                $tempat    = $tempatNgopi[$i];
                for ($j=0; $j < count($user); $j++) {
                    $u   = $user[$j];
                    $this->RatingModel->set('idUser', $u['id_user']);
                    $this->RatingModel->set('idTempatNgopi', $tempat['id_tempat_ngopi']);
                    $rating = $this->RatingModel->get();
                    if ($rating) $matrix[$u['id_user']][$tempat['id_tempat_ngopi']]  = $rating;  
                    else $matrix[$u['id_user']][$tempat['id_tempat_ngopi']]  = 0;
                }
                $data['tempat'][$tempat['id_tempat_ngopi']] = [
                    'foto'      => $tempat['foto'],
                    'nama'      => $tempat['nama'],
                    'alamat'    => $tempat['alamat'],
                    'rating'    => $tempat['rating']
                ];
            }
            $pearson        = [];
            $rataRataUser   = 0;
            foreach ($matrix[$this->session->idUser] as $m) {
                $rataRataUser   += $m;
            }
            $rataRataUser   = $rataRataUser / count($matrix[$this->session->idUser]);
            foreach ($user as $key) {
                $atas       = 0;
                $bawah1     = 0;
                $bawah2     = 0;
                $rataRata   = 0;
                foreach ($matrix[$key['id_user']] as $m) {
                    $rataRata   += $m;
                }
                $rataRata   = $rataRata / count($matrix[$key['id_user']]);
                foreach ($tempatNgopi as $value) {
                    $atas   += (($matrix[$this->session->idUser][$value['id_tempat_ngopi']] - $rataRataUser) * ($matrix[$key['id_user']][$value['id_tempat_ngopi']]  - $rataRata));
                    $bawah1 += pow(($matrix[$this->session->idUser][$value['id_tempat_ngopi']] - $rataRataUser), 2);
                    $bawah2 += pow(($matrix[$key['id_user']][$value['id_tempat_ngopi']] - $rataRata), 2); 
                }
                $totalBawah = sqrt($bawah1 * $bawah2);
                if ($totalBawah == 0) {
                    $pearson[$key['id_user']]   = 0;
                } else {
                    $pearson[$key['id_user']]   = $atas / $totalBawah;
                }
            }
            $prediksi   = [];
            $mae        = [];
            foreach ($tempatNgopi as $tempat) {
                foreach ($user as $u) {
                    $atas       = 0;
                    $bawah      = 0;
                    $rataRata1  = 0;
                    foreach ($matrix[$u['id_user']] as $m) {
                        $rataRata1   += $m;
                    }
                    $rataRata1  = $rataRata1 / count($matrix[$u['id_user']]);
                    foreach ($user as $user1) {
                        if ($pearson[$user1['id_user']] !== 0) {
                            $rataRata   = 0;
                            foreach ($matrix[$user1['id_user']] as $m) {
                                $rataRata   += $m;
                            }
                            $rataRata   = $rataRata / count($matrix[$user1['id_user']]);
                            if ($matrix[$user1['id_user']][$tempat['id_tempat_ngopi']] !== 0) {
                                $atas   += (($matrix[$user1['id_user']][$tempat['id_tempat_ngopi']] - $rataRata) * $pearson[$user1['id_user']]);
                            } else {
                                $atas   += 0;
                            }
                        } else {
                            $atas   += 0;
                        }
                    }
                    foreach ($pearson as $p) {
                        $bawah  += abs($p);
                    }
                    if ($bawah == 0) {
                        $prediksi[$u['id_user']][$tempat['id_tempat_ngopi']] = 0;
                    } else {
                        $prediksi[$u['id_user']][$tempat['id_tempat_ngopi']] = $rataRata1 + ($atas / $bawah);
                    }
                }
            }
            foreach ($tempatNgopi as $tempat) {
                $jumlah = 0;
                foreach ($user as $u) {
                    $jumlah += abs($prediksi[$u['id_user']][$tempat['id_tempat_ngopi']] - $matrix[$u['id_user']][$tempat['id_tempat_ngopi']]);
                }
                $mae[$tempat['id_tempat_ngopi']]    = $jumlah / count($user);
            }
            arsort($mae);
        } else {
            $mae    = null;
        }
        $data['title']          = 'Rekomendasi Tempat Ngopi';
        $data['rekomendasi']    = $mae;
        $this->parser->parse('user/rekomendasi', $data);
    }
}
