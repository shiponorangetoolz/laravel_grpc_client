<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Protobuf\Identity;

/**
 */
class AuthServiceClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \Protobuf\Identity\SignInRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function SignIn(\Protobuf\Identity\SignInRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/protobuf.identity.AuthService/SignIn',
        $argument,
        ['\Protobuf\Identity\Response', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Protobuf\Identity\SignUpRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function SignUp(\Protobuf\Identity\SignUpRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/protobuf.identity.AuthService/SignUp',
        $argument,
        ['\Protobuf\Identity\Response', 'decode'],
        $metadata, $options);
    }

}
