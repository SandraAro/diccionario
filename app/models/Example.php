<?php
class Example extends Eloquent {
    protected $table = "ejemplo";
    protected $primaryKey = "id_ejemplo";
    protected $fillable = array('titulo', 'url_imagen','id_gesto');
    protected $guarded = array('id_ejemplo');
    public $timestamps = false;
}