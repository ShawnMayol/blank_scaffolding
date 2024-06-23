<template>

  <b-container class="bv-example-row">
    <b-row>
  
      <b-col></b-col>
      
      <b-col>
        <div>
          <b-form>
            <b-form-group
              id="input-group-1"
              label="Email address:"
              label-for="input-1"
            >
              <b-form-input
                id="input-1"
                v-model="form.email"
                type="email"
                placeholder="Enter email"
                required
              ></b-form-input>
            </b-form-group>
  
            <b-form-group
              id="input-group-2"
              label="Password:"
              label-for="input-2"
            >
              <b-form-input
                id="input-2"
                v-model="form.password"
                type="password"
                placeholder="Enter password"
                required
              ></b-form-input>
            </b-form-group>
  
            <b-button type="button" @click="register" variant="primary">Sign up</b-button>
          </b-form>
        </div>
      </b-col>
      
      <b-col></b-col>
  
    </b-row>
  </b-container>
  
  </template>
  
  <script>
    import axios from 'axios';
  
    export default {
      data() {
        return {
          form: {
            email: '',
            password: '',
          },
        };
      },
      methods: {
  
        register() {
          axios.post('/register/registration',this.form).then(response=>{
            console.log(response.data.email);
            console.log(response.data.password);
          }).catch(error=>{
            console.log(error.data);
            this.loading = false;
          })
        }
  
      }
    }
  </script>