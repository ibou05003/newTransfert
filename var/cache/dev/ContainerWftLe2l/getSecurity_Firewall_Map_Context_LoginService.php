<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'security.firewall.map.context.login' shared service.

include_once $this->targetDirs[3].'/vendor/symfony/security-bundle/Security/FirewallContext.php';
include_once $this->targetDirs[3].'/vendor/symfony/security-http/Util/TargetPathTrait.php';
include_once $this->targetDirs[3].'/vendor/symfony/security-http/Firewall/ExceptionListener.php';
include_once $this->targetDirs[3].'/vendor/symfony/security-http/Firewall/ListenerInterface.php';
include_once $this->targetDirs[3].'/vendor/symfony/security-http/Firewall/LegacyListenerTrait.php';
include_once $this->targetDirs[3].'/vendor/symfony/security-http/Firewall/LogoutListener.php';
include_once $this->targetDirs[3].'/vendor/symfony/security-http/Logout/LogoutSuccessHandlerInterface.php';
include_once $this->targetDirs[3].'/vendor/symfony/security-http/Logout/DefaultLogoutSuccessHandler.php';
include_once $this->targetDirs[3].'/vendor/symfony/security-http/Logout/LogoutHandlerInterface.php';
include_once $this->targetDirs[3].'/vendor/symfony/security-http/Logout/CsrfTokenClearingLogoutHandler.php';
include_once $this->targetDirs[3].'/vendor/symfony/security-bundle/Security/FirewallConfig.php';

$a = ($this->services['security.token_storage'] ?? ($this->services['security.token_storage'] = new \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage()));
$b = ($this->privates['security.http_utils'] ?? $this->load('getSecurity_HttpUtilsService.php'));
$c = new \Symfony\Component\Security\Http\Firewall\LogoutListener($a, $b, new \Symfony\Component\Security\Http\Logout\DefaultLogoutSuccessHandler($b, 'login'), ['csrf_parameter' => '_csrf_token', 'csrf_token_id' => 'logout', 'logout_path' => 'app_logout']);
$c->addHandler(new \Symfony\Component\Security\Http\Logout\CsrfTokenClearingLogoutHandler(($this->privates['security.csrf.token_storage'] ?? $this->load('getSecurity_Csrf_TokenStorageService.php'))));

return $this->privates['security.firewall.map.context.login'] = new \Symfony\Bundle\SecurityBundle\Security\FirewallContext(new RewindableGenerator(function () {
    yield 0 => ($this->privates['security.channel_listener'] ?? $this->load('getSecurity_ChannelListenerService.php'));
    yield 1 => ($this->privates['security.authentication.listener.json.login'] ?? $this->load('getSecurity_Authentication_Listener_Json_LoginService.php'));
    yield 2 => ($this->privates['security.authentication.listener.anonymous.login'] ?? $this->load('getSecurity_Authentication_Listener_Anonymous_LoginService.php'));
    yield 3 => ($this->privates['security.access_listener'] ?? $this->load('getSecurity_AccessListenerService.php'));
}, 4), new \Symfony\Component\Security\Http\Firewall\ExceptionListener($a, ($this->privates['security.authentication.trust_resolver'] ?? ($this->privates['security.authentication.trust_resolver'] = new \Symfony\Component\Security\Core\Authentication\AuthenticationTrustResolver(NULL, NULL))), $b, 'login', NULL, NULL, NULL, ($this->privates['logger'] ?? ($this->privates['logger'] = new \Symfony\Component\HttpKernel\Log\Logger())), true), $c, new \Symfony\Bundle\SecurityBundle\Security\FirewallConfig('login', 'app.user_checker', '.security.request_matcher.HeUdK73', true, true, 'security.user.provider.concrete.app_user_provider', NULL, NULL, NULL, NULL, [0 => 'json_login', 1 => 'anonymous'], NULL));
