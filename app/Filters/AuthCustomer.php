<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthCustomer implements FilterInterface
{
    public function before(RequestInterface $request)
    {
        if(session()->has('role') && session()->has('username')){
            if(session()->get('role')!=='customer'){
                if(session()->get('role')=='admin'){
                    return redirect()->to('/admin');
                }
                elseif(session()->get('role')=='seller'){
                    return redirect()->to('/seller');
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