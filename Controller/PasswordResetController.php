<?php
App::uses('AppController', 'Controller');
class PasswordResetController extends AppController
{
    public $name = 'PasswordReset';
    public $uses = array('Usuario', 'UsuarioVerificationReset');
    public $components = array('xEmail');

    public function index()
    {
        if (!empty($this->request->data)) {
            $user_data = $this->Usuario->find('first', array(
                'conditions' => array(
                    'OR' => array(
                        'Usuario.email' => $this->request->data['UsuarioVerificationReset']['data_verify'],
                    ),
                ),
            ));

            if (!empty($user_data)) {
                $recover_key = uniqid('e');
                $data_verify = array(
                    'user_id' => $user_data['Usuario']['id'],
                    'recover_key' => $recover_key,
                    'expiration_date' => date('Y-m-d H:i:s', strtotime('+1 hour')),
                );

                $this->UsuarioVerificationReset->create();
                if ($this->UsuarioVerificationReset->save($data_verify)) {
                    $this->set('site', $this->conf['domain']);
                    $this->set('data', date("d/m/Y"));
                    $this->set('hr', date("H:i:s"));

                    $this->xEmail->to = $user_data['Usuario']['email'];
                    $this->xEmail->replyTo = $user_data['Usuario']['email'];
                    $this->xEmail->subject = 'Solicitação de redefinição de senha';
                    $this->xEmail->template = 'contact';
                    $this->xEmail->sendAs = 'html';

                    $dados_email = array(
                        'Link' => Router::url('/', true) . 'password_reset/verify_recover_key/' . $recover_key
                    );
                    $this->set('dados', $dados_email);
                    $this->set('subject', $this->xEmail->subject);
                    $this->set('IP', $this->request->clientIp());

                    if ($this->xEmail->send()) {
                        $this->flash('Um link de redefinição de senha foi enviado para o seu e-mail.', '/password_reset', 'success');
                        return;
                    } else {
                        $this->flash('Erro ao enviar o e-mail, tente novamente.', '/password_reset', 'success');
                        return;
                    }
                }

            } else {
                $this->flash('Usuário não encontrado, verifique seus dados e tente novamente.', '/password_reset', 'success');
                return;
            }
        }
    }

    public function verify_recover_key($recover_key)
    {

        $this->set('recover_key', $recover_key);

        $code_verify = $this->UsuarioVerificationReset->find('first', array(
            'conditions' => array(
                'UsuarioVerificationReset.recover_key' => $recover_key,
            ),
        ));

        if (!empty($code_verify)) {
            if ($code_verify['UsuarioVerificationReset']['expiration_date'] > date('Y-m-d H:i:s')) {
                $this->Session->write('UserId', $code_verify['UsuarioVerificationReset']['user_id']);
            } else {
                $this->UsuarioVerificationReset->deleteAll(array('UsuarioVerificationReset.recover_key' => $recover_key), false);
                $this->flash('O link de redefinição de senha expirou, solicite um novo.', '/password_reset', 'success');
                return;
            }
        } else {
            $this->flash('O link de redefinição de senha é inválido, solicite um novo.', '/password_reset', 'success');
            return;
        }

        if (!empty($this->request->data)) {
            $this->Usuario->set($this->request->data);
            if ($this->Usuario->validates()) {
                $form = $this->request->data['Usuario'];
                $data = array(
                    'senha' => $form['senha'],
                    'confirma_senha' => $form['confirma_senha'],
                );

                if ($data['senha'] == $data['confirma_senha']) {
                    $this->Usuario->id = $this->Session->read('UserId');

                    $this->Usuario->saveField('senha', $data['senha']);

                    $this->UsuarioVerificationReset->deleteAll(array('UsuarioVerificationReset.recover_key' => $recover_key), false);

                    $this->flash('Senha alterada com sucesso.', '/usuarios/login', 'success');
                    return;
                } else {
                    $this->flash('As senhas não conferem, tente novamente.', '/password_reset', 'success');
                    return;
                }
            } else {
                return;
            }
        }
    }

}
