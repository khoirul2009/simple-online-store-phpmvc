<?php


class Flasher
{
    public static function setFlash($nama, $data, $tipe)
    {
        $_SESSION[$nama] = [
            'data' => $data,
            'tipe' => $tipe
        ];
    }
    public static function flash($nama)
    {
        if (isset($_SESSION[$nama])) {
            echo '
                <div class="alert alert-' . $_SESSION[$nama]['tipe'] . ' alert-dismissible fade show" role="alert">
                    ' . $_SESSION[$nama]['data'] . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                ';
        }
        unset($_SESSION[$nama]);
    }
}
