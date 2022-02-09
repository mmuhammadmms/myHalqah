<template>
  <div>
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Create People</h1>
    
    <a href="" class=" btn btn-sm btn-primary shadow-sm">
       Back</a>
</div>

<div >
    <form @submit.prevent ="storePeople">
      
        <div class="form-row  align-items-center">
          <div class="form-group col-md-6">
            <label for="name">Nama </label>
            <input id="name" type="text" class="form-control" v-model="form.name" name="name" value="" required autocomplete="name" autofocus>

          </div>
          <div class="form-group col-md-6">
            <label for="address">Alamat </label>
            <input id="address" type="text" class="form-control" v-model="form.address" name="address" value="" required autocomplete="address" autofocus>

             
          </div>
          <div class="form-group col-md-6">
            <label for="exp">Pengalaman </label>
            <select id="exp" class="form-control" name="exp" v-model="form.exp">
              <option selected>Choose...</option>
              <option value="4B BBNJ">4B BBNJ</option>
              <option value="4B IPB">4B IPB</option>
              <option value="4B DN">4B DN</option>
              <option value="40 H">40 H</option>
              <option value="3 H">3 H</option>
            </select>

          </div>
          <div class="form-group col-md-6">
            <label for="no_phone">No Tel </label>
            <input id="no_phone" type="text" class="form-control" name="no_phone" value=""  autocomplete="no_phone" autofocus v-model="form.no_phone">
          </div>

          <div class="form-group col-md-6">
            <label for="name">Mohalla</label>
            <select id="mohalla_id" class="form-control" name="mohalla_id" v-model="form.mohalla_id">
              <option selected >Choose...</option>
              <option selected v-for="mohalla in mohallas" :key="mohalla.id" :value="mohalla.id">{{ mohalla.name }}</option>
            </select>

          </div>
        </div>


        <button type="submit" class="btn btn-primary">Daftar Orang</button>
      </form>
</div>
  </div>
</template>

<script>
export default {
    data(){
        return {
            mohallas: [],
            form: {
                name: '',
                address: '',
                exp: '',
                no_phone: '',
                mohalla_id:'',
            }
        }
    },
    created(){
        this.getMohallas();
    },
    methods:{
        getMohallas(){
            axios.get('/api/peoples/getMohallas')
            .then(res => {
                this.mohallas = res.data;
            }).catch(error => {
                console.log('error =',error);
            })
        },
        storePeople(){
            axios.post('/api/peoples',{
                'name': this.form.name,
                'address': this.form.address,
                'exp': this.form.exp,
                'no_phone': this.form.no_phone,
                'mohalla_id': this.form.mohalla_id
            })
            .then(res => {
                console.log('res store',res);
                this.$router.push({
                    name: 'PeoplesIndex',
                    params: {
                        message: 'People Created Successfully.'
                    }

                })
            })
            .catch(error => {
                console.log('error = ',error);
            })
        }
    }
}
</script>

<style>

</style>