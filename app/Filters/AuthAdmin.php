<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthAdmin implements FilterInterface
{
    public function before(RequestInterface $request)
    {
        if(session()->has('role') && session()->has('username')){
            if(session()->get('role')!=='admin'){
                if(session()->get('role')=='seller'){
                    return redirect()->to('/seller');
                }
                elseif(session()->get('role')=='customer'){
                    return redirect()->to('/customer');
                }
            }
        }else{
            return redirect()->to('/');
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response)
    {
        // Do something here
    }
}