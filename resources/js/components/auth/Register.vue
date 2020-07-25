<template>
        <div id="container" :class="{'showContainer':showContainer}">
            <div id="progress" :style="{width:progress}"></div>
            <div id="register">
               
               <div id="input-container">
               
                <form @submit.prevent="register" :class="{'form loading':loading}">
                  <form-wizard @on-complete="onComplete" color="#605CA8">
                  <div class="header" slot="title">
                   <div class="logo">
                      <div class="header">
                        <div class="logo">
                            <img src="images/tunner.png" width="70px" height="70px" />
                            </div>
                        </div>
                    </div>
                </div>
                    <tab-content title="Personal details" icon="fa fa-user" :before-change="()=>validateStep('personal')" >
                        <personal ref="personal" @on-validate="mergePartialModels"  @progressChange="progressChange"></personal>
                    </tab-content>
                    <tab-content title="Address Info" :before-change="()=>validateStep('address')">
                        <address-view ref="address" @on-validate="mergePartialModels"></address-view>
                    </tab-content>
                    <tab-content title="Category" :before-change="()=>validateStep('category')">
                        <category-view ref="category" @on-validate="mergePartialModels"></category-view>                        
                    </tab-content>
                     <tab-content title="Password" :before-change="()=>validateStep('password')" >
                        <password-view ref="password" @on-validate="mergePartialModels"></password-view>                        
                    </tab-content>
                    
                    </form-wizard>
                </form>
               
               </div>
             </div>
 
         </div>
   </template>
<script>
//local registration
import {FormWizard, TabContent,helpers} from 'vue-form-wizard'
import 'vue-form-wizard/dist/vue-form-wizard.min.css'



import { ValidationProvider } from 'vee-validate';
   export default {
       components: {
             ValidationProvider,
             FormWizard,
             TabContent,
             },
        data(){ 
            return {
                email:"",
                newUser:{},
                progress:"0%",
                inputVal:"",
                showContainer:false,
                loading:false,
                serverErrors:"",
                step:1
            } 
        },
        methods:{
            validateStep(name) {
                var refToValidate = this.$refs[name];
                return refToValidate.validate();
            },
            mergePartialModels(model, isValid){
            if(isValid){
            // merging each step model into the final model
            this.newUser = Object.assign({},this.newUser, model)
            this.progress=this.step/4*100 + "%";
            if(this.step>4) return;
            if(isValid) this.step++;
            console.log(this.progress)
            
            }
           },
            
            showStep(){
                setTimeout(()=>{
                    this.showContainer=true
                },100)
            },
            checkStep(){
                console.log(this.newUser)
            },
            register(){
                this.serverErrors="";
                this.loading=true;
                this.$store.dispatch("regiseterUser",{
                    nickname:this.newUser.nickname,
                    email:this.newUser.email,
                    phoneNo:this.newUser.phoneNo,
                    category:this.newUser.category,
                    password:this.newUser.password,
                }).then(response=>{
                    this.newUser.nickname=""
                    this.newUser.email=""
                    this.newUser.phoneNo=""
                    this.newUser.category=""
                    this.newUser.password=""
                    this.loading=false;
                    this.$toast.success({
                        title:"Account Created",
                        message:"You account as been crated. Please varify your email address"
                    });
                    window.location.href="http://localhost:8000/account/created/success";
                }).catch(err=>{
                    this.loading=false;
                    this.serverErrors=Object.values(err.response.data.errors);
                    this.$toast.error({
                        title:"Server Error",
                        message:"please make sure that each field are filled correctly"
                    });
                })
            },
            
            onComplete(){
                this.register();
            },
            progressChange(){
                    console.log("yessss")
            },

            doSome(e,data){
                clearTimeout(timer);
                this.newUser.nickname=e.target.value
                var timer=setTimeout(this.checkUser(data),1000)

            },
            checkUser(data){
                alert(data);
            }

        },

        mounted() {
           
            console.log('Component mounted register',helpers);
             this.showStep()
        },
    }
</script>
<style src="cxlt-vue2-toastr/dist/css/cxlt-vue2-toastr.css"></style>
<style lang="scss" >
  
  @import url("/css/plugin/semantic/input.css");
//   @import url("/cxlt-vue2-toastr/dist/css/cxlt-vue2-toastr.css");
  .btn-button{
      background:#605ca8;
      color:white;
  }
  .progressBar{
      margin-left:-32px;
  }
  #container{
      position:relative;
      font-family:"Noto Sans",sans-serif;
      font-size:1rem;
      color:#333;
      width:100%;
      min-height:80vh;
      display:flex;
      justify-content:center;
      align-items:center;
      background:transparent;
      opacity:0;
      transition:0.3s ease-in-out;
      
      #progress{
          position:absolute;
          top:0;
          left:0;
          width:0%;
          height:100vh;
          background-color:#605ca842;
          transition:width .8s ease-in-out

      }
  }
  #input-container{
      position:relative;
      margin-right:0px;
      padding:18px 20px 20px 0px;
      margin-top:-8px;
      & label{
           margin-left:0px;
           color:#605ca8;
           font-size:14px;
      }
      & input{
          border-radius:0px;
          padding:10px;
      }
  }
  #register{
      position:relative;
      width:480px;
      padding:10px;
      background-color:#fff;
      box-shadow:0 15px 30px rgba(0,0,0,0.2),
                 0 10px 10px rgba(0,0,0,0.2)

  }
  .input-field{
      position:relative;
      width:100%;
      font-weight:bolder;
      outline:none;
      border:none;
      background:white;
      font-size:1.35rem;
      align-items:center;
      margin-top:0px;
      padding:10px;
      border-bottom:2px solid #605ca8;
      &:valid + #input-label{
          top:3px;
          left:43px;
          font-size:1rem;
          font-weight:normal;
          color:#999

      } 
  }
  #input-label{
      position:absolute;
      top: 30px;
      left: 11px;
      font-size:1.35rem;
      pointer-events:none;
      transition:0.2s ease-in-out
  }

  .inputProgress{
      border-bottom:3px solid #605ca8;
      width:0%;
      transition:width 0.6s ease-in-out
  }
  .showContainer{
    opacity:1 !important;

    .inputProgress{
        width:100%
    }
  }
  .previousBtn{
      position:absolute;
      left:20px;
      top:4px;
      color:#9e9e9e;
      cursor:pointer;
      z-index:20;
      font-size:1rem;
      &:hover{
          color:#605ca8
      }
  }

  .nextBtn{
      position:absolute;
      right: 20px;
      top: 28px;
      color:#9e9e9e;
      cursor:pointer;
      z-index:20;
      font-size:3rem;
      &:hover{
          color:#605ca8
      }
  }

.loadingu{
  -webkit-animation: form-spin 0.6s linear;
  animation: form-spin 0.6s linear;
  -webkit-animation-iteration-count: infinite;
  animation-iteration-count: infinite;
  font-size:18px;
}  
.loading.form {
  position: relative;
  cursor: default;
  pointer-events: none;
}


.loading.form:before {
  position: absolute;
  content: '';
  top: 0%;
  left: 0%;
  background: rgba(255, 255, 255, 0.8);
  width: 100%;
  height: 100%;
  z-index: 100;
}

.loading.form:after {
  position: absolute;
  content: '';
  top: 50%;
  left: 50%;
  margin: -1.5em 0em 0em -1.5em;
  width: 3em;
  height: 3em;
  -webkit-animation: form-spin 0.6s linear;
  animation: form-spin 0.6s linear;
  -webkit-animation-iteration-count: infinite;
  animation-iteration-count: infinite;
  border-radius: 500rem;
  border-color: #767676 rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1);
  border-style: solid;
  border-width: 0.2em;
  -webkit-box-shadow: 0px 0px 0px 1px transparent;
  box-shadow: 0px 0px 0px 1px transparent;
  visibility: visible;
  z-index: 101;
}


@-webkit-keyframes form-spin {
  from {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }

  to {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}

@keyframes form-spin {
  from {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }

  to {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
 
</style>