<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class System extends Model {
    static function ImagemProdutoLink($img, $width, $height){
		$imagem = url() . "assets/images/products/timthumb.php?src={$img}&w={$width}&h={$height}&zc=1";
		return $imagem;
	}
}