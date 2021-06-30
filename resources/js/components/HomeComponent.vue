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
  </div><br/><br/><br/>
 <!--form end -->


<!--search bar open tag -->
 <div class="card">
<div class="card-body">
  <div class="col-lg-2 col-md-2 col-sm-2">
     <input  type="text" class="form-control" /><br> <!--data catching -->
     <button @click="search_user()" class="btn btn-success">Search</button><br/><br/><br/> <!--function to search -->
     <button @click="get_data()" class="btn btn-primary"> Show All Users</button>
  </div>
 </div>
 </div>
<!--search bar end tag -->



  <!--table start -->
 <div class="card">
  <div class="card-body">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">User Name</th>
      <th scope="col">E-mail</th>
      <th scope="col">address</th>
      <th scope="col">mobile</th>
      <th scope="col">Action</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="(user,index) in user_data" :key="index">
      <th scope="row">{{user.id}}</th>
      <td>{{user.username}}</td>
      <td>{{user.mail}}</td>
      <td>{{user.address}}</td>
      <td>{{user.mobile}}</td>
      <td><button @click="user_update()" type="submit" class="btn btn-info">Update</button></td>
      <td><button @click="user_delete()" type="submit" class="btn btn-info">Delete</button></td>
    </tr>
  </tbody>
</table>
  </div>
</div>
 <!--table end -->

</div>
</template>


<script>
export default {

  computed:{},
  mounted() {},
  created() {
       this.get_data();  //9.page akk load weddi run wenne created functions ake atule thiyana awa
    },
    data () {
        return {
            user:new Form({  //user oject create
                id:"",
                user_name:"",
                email:"",
                address:"",
                mobile:"",
            }),

            user_data: {},


        };
    },



    methods:{
        add_users() {
            this.user.post('/api/add_user_ad')
               .then(response => {
                if (response.status == 200) {
                    this.$toaster.success(response.data.msg)
                  //this.$router.push('/home');
                 //swal.fire(response.data.msg);
                }
                  this.user.reset();   //reset the form data after submit
            })

            .catch(error => {
                console.log(error);
            });
        },

           get_data:function() {
           axios.get('/api/get_user_data')
          .then((response) => {
               if(response.status == 200) {

                 this.user_data=response.data;                     //5.
               }


           })
           .catch((error) => {
               console.log(error);
           });
    }







    }




}
</script>

<style>

</style>
