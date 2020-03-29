<template>
    <div class="wrap-input100 validate-input m-b-26" style="border-bottom: 0px">
        <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
            <span class="label-input100">Username</span>
            <input class="input100" type="text" placeholder="Username" name="username">
            <span class="focus-input100"></span>
        </div>
        <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
            <span class="label-input100">Password</span>
            <input class="input100" type="password" name="password" placeholder="Password">
            <span class="focus-input100"></span>
        </div>
        <div class="flex-sb-m w-full p-b-30">
            <div class="contact100-form-checkbox">
                <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                <label class="label-checkbox100" for="ckb1">
                    Remember me
                </label>
            </div>
            <div>
                <a href="#" class="txt1">
                    Forgot Password?
                </a>
            </div>
        </div>
        <div class="container-login100-form-btn" >
            <div class="flex-sb-m w-full p-b-30">
                <div class="contact100-form">
                    <button class="login100-form-btn" type="submit" style="background-color: #DE6262;">
                        Login
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>