<template>
  <div>
    <router-link to="/item/create">Tambah Data</router-link>
    <center>
      <br>
      <h2>Daftar Data Item</h2>
      <table border="1">
          <tr>
            <th>No</th>
            <th>Merk</th>
            <th>Nama Barang</th>
            <th>Kapasitas</th>
            <th>Harga</th>
            <th>Action</th>
          </tr>
          <tr v-for="(item, i) in data_item" :key="i">
            <td>{{ i + 1 }}</td>
            <td>{{ item.merk }}</td>
            <td>{{ item.nama_barang }}</td>
            <td>{{ item.kapasitas }}</td>
            <td>{{ item.harga }}</td>
            <td>
              <router-link :to="'/item/' + item.id">Edit</router-link>
              <button @click="deleteRow(item.id)">Delete</button>
            </td>
          </tr>
      </table>
    </center>
  </div>
</template>

<script>
import { api } from '@/helper/api'

export default {
  name: 'Item',
  data (){
    return {
      data_item: []
    }
  },
  mounted (){
    this.get()
  },
  methods: {
    get (){
      api.get('item').then(res => {
        if(res.data.status === 'success'){
          this.data_item = res.data.result
        }else{
          console.log(res.data.message)
        }
      }).catch(err => {
        console.log(err)
      })
    },
    deleteRow (id){
      api.delete('item/' + id).then(res => {
        if (res.data.status === 'success'){
          this.get()
        }else {
          console.log(res.data.message)
        }
      }).catch(err => {
        console.log(err)
      })
    }
  }
}
</script>
