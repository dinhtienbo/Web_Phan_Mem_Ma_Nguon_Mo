<?php 
namespace App\Filters;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AdminFilter implements FilterInterface{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session =session();
        if($session->has('login')){
            return redirect('/');
        }
        if(!$session->has('loginAdmin')){
            return redirect('login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }
}
?>