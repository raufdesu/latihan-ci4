<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * BaseController — tempat memuat komponen yang dipakai SEMUA controller.
 *
 * Materi Pertemuan 3 (slide "Helper URL, Form & esc()"):
 * helper yang didaftarkan di sini otomatis tersedia di seluruh controller
 * dan view, sehingga tidak perlu helper('url') berulang-ulang.
 */
abstract class BaseController extends Controller
{
    /**
     * Helper yang selalu dimuat.
     * - url  : site_url(), base_url()
     * - form : form_open(), form_close(), form_input(), old()
     * - html : komponen HTML kecil (mis. list_item)
     *
     * @var list<string>
     */
    protected $helpers = ['url', 'form', 'html'];

    /**
     * Service session, siap dipakai sebagai $this->session
     * (dipakai untuk status login & flashdata).
     */
    protected $session;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Jangan ubah baris ini.
        parent::initController($request, $response, $logger);

        // Muat service session sekali, pakai di semua method.
        $this->session = session();
    }
}
