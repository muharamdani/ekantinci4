<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthSeller implements FilterInterface
{
    public function before(RequestInterface $request)
    {
        if(session()->has('role') && session()->has('username')){
            if(session()->get('role')!=='seller'){
                if(session()->get('role')=='admin'){
                    return redirect()->to('/admin');
                }
                elseif(session()->get('role')=='customer'){
                    return redirect()->to('/customer');
                }
            }
        }
        else{
            return redirect()->to('/');
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response)
    {
        // Do something here
    }
}