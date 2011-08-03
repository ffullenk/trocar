<?php
/**
 * registerActions contiene las acciones del modulo registro
 *
 * @package    trocar
 * @subpackage register
 * @author     dacuna
 * @version    1.0 2011-06-12 20:16
 */
class userActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
  }
  
  /**
  * Ejecuta la accion de registro de un usuario
  *
  * @param sfRequest $request Objeto http request
  */
  public function executeRegister(sfWebRequest $request)
  {
    if($this->getUser()->isAuthenticated())
    {
      $this->redirect('@homepage');
	  }
    else
    {
      $this->form = new RegisterForm();
      $params = $request->getParameter('signup');
      if($request->isMethod('post'))
      {
        $this->form->bind($params);
        if($this->form->isValid())
        {
          $this->form->save();
      
          $user = $this->form->getObject();
      
          //se crea la fila correspondiente al perfil del usuario
          $profile = $user->getProfile();
          //ademas se asigna por defecto el grupo de miembros (member) al 
          //usuario que se acaba de registrar
          $user->addGroupByName('member');
          $user->save();
      
          //auto login y redireccion al homepage
          $this->getUser()->signIn($this->form->getObject());
          $this->redirect('@register');
        }
      }
    }
  }

  /**
   * Realiza el login y registro de usuarios mediante facebook. Si el usuario
   * ya existe en la aplicacion entonces se ejecuta el login correspondiente.
   *
   * @param sfRequest $request Objeto http request
   */
  public function executeFbConnect(sfWebRequest $request)
  {
    $facebook = new Facebook(array(
              'appId'  => '179663705425430',
              'secret' => '8f4ff2a38e097f4574115fab3d296eba',
              'cookie' => true,
    ));
      
    $session = $facebook->getSession();
    $me = null;
    // Llamada a la API mediante Session, cuando facebook actualice su
    // javascript-sdk se debe actualizar tambien este codigo para que
    // funcione utilizando el php-sdk version 3 (actualmente se tiene la
    // version 2.
    if($session) 
    {
      try
      {
        $uid = $facebook->getUser();
        $this->logMessage('facebook uid: '.$uid, 'info');
        $me = $facebook->api('/me');
        //se obtiene el usuario que corresponda con el facebook_id (si es que existe)    
        $user = Doctrine_Core::getTable('sfGuardUser')->getUserByFacebookId($uid);

        if($user) //Primer caso: se tiene la id de facebook del usuario en la base de datos
        {
          //basta con hacer el login
          $this->getUser()->signin($user);
        }
        else
        {
          $user = Doctrine_Core::getTable('sfGuardUser')->retrieveByUsername($me['email']);
          if($user) //Caso 2: no se tiene el faceboo_id pero si se tiene el email del usuario
          {
            $profile = $user->getProfile();
            //Se almacena el facebook_id
            $profile->setFacebookUid($uid);
            $user->save();
            $this->getUser()->signin($user);
          }
          else
          {
            //Caso 3: no existe el usuario en la base de datos, se agrega:
            $new_user = new sfGuardUser();
            $new_user->setUsername($me['email']);
            $new_user->addGroupByName('member');
            $new_profile = $new_user->getProfile();
            $new_profile->setFirstName($me['first_name']);
            $new_profile->setLastName($me['last_name']);
            $new_profile->setFacebookUid($uid);
            $new_user->save();
            //se ejecuta el login
            $this->getUser()->signin($new_user);
          }
        }

        if($referer=$request->getReferer())
        {
          $this->logMessage('referer: '.$request->getReferer(), 'info');
          //Si es que se tiene un referer, se redirecciona a esa direccion
          $this->redirect($request->getReferer());
        }
        else
          $this->redirect('@homepage');
      }
      catch (FacebookApiException $e) 
      {
        error_log($e);
      }
    }
  }
  
  /**
  * Accion para editar los datos del perfil de un usuario
  *
  * @param sfRequest $request Objeto http request
  */
  public function executeEditProfile(sfWebRequest $request)
  {
    //se obtiene el perfil del usuario
    $profile = $this->getUser()->getProfile();
    //se crea el formulario que permitira editar sus datos
    $this->form = new sfGuardUserProfileForm($profile);
    //se postea el formulario
    if($request->isMethod('put'))
    {
      $params = $request->getParameter('edit');
      $this->form->bind($params, $request->getFiles($this->form->getName()));
      if($this->form->isValid())
      {
        $this->form->save();
        $this->getUser()->setFlash('edit', 'Tus datos se han actualizado con exito');
        $this->redirect($this->generateUrl('default', array('module' => 'user',
                                            'action' => 'editProfile')));
      }
    }
  }
}
