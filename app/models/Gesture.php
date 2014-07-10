<?php
class Gesture extends Eloquent {

    protected $table = "gesto";
    protected $primaryKey = "id_gesto";
    protected $fillable = array('titulo', 'url_video', 'url_imagen', 'definicion');
    protected $guarded = array('id_gesto');
    public $timestamps = false;

    public function examples() {
        return $this->hasMany('Example','id_gesto');
    }

}