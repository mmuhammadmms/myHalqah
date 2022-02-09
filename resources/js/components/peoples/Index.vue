@<template>
<div>
        <!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">People</h1>
    
    <a href="#" class=" btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
            <router-link :to="{name:'PeoplesCreate'}" class="btn btn-primary shadow-sm">Create</router-link>
   
</div>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <select class="form-control" @change="searchByMohalla" v-model="searchSelect">
  <option>By Mohalla</option>
  <option v-for="mohalla in mohallas" :key="mohalla.id" :value="mohalla.id">{{ mohalla.name }}</option>
</select>
  </div>
  <input type="text" class="form-control" aria-label="Text input with dropdown button" v-model="searchInput" @change="searchByText">
</div>

<div class="">

    <div v-if="showMessage" class="alert alert-success">
        {{ message }}
    </div>

</div>
<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Mohalla</th>
        <th scope="col">Nama</th>
        <th scope="col">Pengalaman</th>
        <th scope="col">No Tel</th>
        <th scope="col">Alamat</th>
        <th scope="col">Manage</th>
      </tr>
    </thead>
    <tbody>
    <tr v-for="people in peoples" :key="people.id" :value="people.id">
        <td scope="col">{{ people.name }}</td>
        <td scope="col">{{ people.name }}</td>
        <td scope="col">{{ people.exp }}</td>
        <td scope="col">{{ people.no_phone }}</td>
        <td scope="col">{{ people.address }}</td>
        <td scope="col"><router-link :to="{name: 'PeoplesEdit', params:{id: people.id}}" class="btn btn btn-primary">Edit</router-link>
        <button class="btn btn-danger" @click="deletePeople(people.id)">Delete</button>
        </td>
    </tr>
     
        
  
      
     
    </tbody>
  </table> 
</div>
</template>

<script>
export default {
    data() {
        return {
            peoples: [],
            showMessage: false,
            message: '',
            mohallas: [],
            searchSelect: '',
            searchInput: ''
        }
    },
    created() {
        this.getPeoples();
        this.getMohallas();
    },
    methods:{
        getPeoples(){
            axios.get('/api/peoples/getPeoples')
            .then(res => {
                this.peoples = res.data.data
            }).catch(error =>{
                console.log('error', error);
            })
        },
        getMohallas(){
            axios.get('api/peoples/getMohallas')
            .then(res => {
                this.mohallas = res.data;
                console.log('res' , res);
                console.log('mohallas = ' , res.data);
            })
        },
        searchByMohalla(){
            axios.get('/api/peoples/getPeoples', {
                params: {
                    search: this.searchSelect,
                }
            }).then(res => {
                this.peoples = res.data.data; 
            })
            console.log('search = ' , this.searchSelect);
            console.log('in');
        },
        searchByText(){
            console.log('before ', this.peoples);
            const peoples = this.peoples
            console.log('input = ' , this.searchInput);
            let searchValue = this.searchInput;
            console.log('peopels , ',peoples);
            // let filteredNames = peoples.filter(peoples => peoples.include(searchValue));
            // console.log('afer = ' , filteredNames);
            console.log('type of ' , typeof peoples)
        },
        deletePeople(id){
            axios.delete('/api/peoples/deletePeoples/' + id)
            .then(res => {
                console.log('res' , res);
                this.getPeoples();
                this.showMessage = true;
                this.message = res.data;
            }).catch(err =>{
                console.log('error = ', err);
            }) 
        }
    }
}
</script>

<style>

</style>