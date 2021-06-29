<template>
<div>

  <!--form start -->
<div class="col-lg-12 col-md-12 col-sm-12">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <h3>User Registraion Form</h3>
            </div>
            <br />
            <form @submit.prevent>
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-4">
                <label for="">User Name</label>
                <input type="text" v-model="user.user_name"  class="form-control"
                :class="{'is-invalid':user.errors.has('user_name')}"/>
                <div class="text-danger" v-if="user.errors.has('user_name')" v-html="user.errors.get('user_name')"/>
              </div>
              <br/>
              <div class="col-lg-4 col-md-4 col-sm-4">
                <label for="">Email</label>
                <input type="text" v-model="user.email" class="form-control"
                :class="{'is-invalid':user.errors.has('email')}"/>
                 <div class="text-danger" v-if="user.errors.has('email')" v-html="user.errors.get('email')"/>
              </div>
              <br/>
              <div class="col-lg-4 col-md-4 col-sm-4">
                <label for="">Address</label>
                <input type="text" v-model="user.address" class="form-control"
                 :class="{'is-invalid':user.errors.has('address')}"/>
                 <div class="text-danger" v-if="user.errors.has('address')" v-html="user.errors.get('address')"/>
              </div>
              <br/>
            </div>
            <br />
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-4">
                <label for="">Mobile</label>
                <input type="text" v-model="user.mobile" class="form-control"
                 :class="{'is-invalid':user.errors.has('mobile')}"/>
                 <div class="text-danger" v-if="user.errors.has('mobile')" v-html="user.errors.get('mobile')"/>
              </div>
              <br/>
              <div class="col-lg-8 col-md-8 col-sm-8">
                  <button @click="add_users()" class="btn btn-success">Submit</button>
              </div>
              <br/>
            </div><br/><br/>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
 <!--form end -->

</div>
</template>


<script>
export default {


    data () {
        return {
            user:new Form({  //user oject create
                user_name:"",
                email:"",
                address:"",
                mobile:"",
            }),


        };
    },



    methods:{
        add_users() {
            this.user.post('/api/add_user_ad')
               .then(response => {
                if (response.status == 200) {
                  // this.$router.push('/home');
                 swal.fire(response.data.msg);
                }
                  this.user.reset();   //reset the form data after submit
            })

            .catch(error => {
                console.log(error);
            });
        }

    }




}
</script>

<style>

</style>
