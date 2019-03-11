<template>
  <div>
    <form @submit.prevent="submitForm">
      <br>
      <center>
        <table>
            <tr>
              <td><label>Merk</label></td>
              <td><input type="text" v-model="item.merk"></td>
            </tr>
            <tr>
              <td><label>Nama Barang</label></td>
              <td><input type="text" v-model="item.nama_barang"></td>
            </tr>
            <tr>
              <td><label>Kapasitas</label></td>
              <td><input type="text" v-model="item.kapasitas"></td>
            </tr>
            <tr>
              <td><label>Harga</label></td>
              <td><input type="number" v-model="item.harga"></td>
            </tr>
            <tr>
              <td></td>
              <td><button type="submit">Save</button></td>
            </tr>
        </table>
      </center>
    </form>
  </div>
</template>

<script>
import { api } from '@/helper/api'

export default {
  name: 'ItemForm',
  data (){
    return{
      item: {
        id: null,
        merk: '',
        nama_barang: '',
        kapasitas: '',
        harga: ''
      }
    }
  },
  mounted (){
    let id = this.$route.params.id

    if (id){
      api.get('/item/' + id).then(res => {
        this.item = res.data.result
      })
    }
},
methods: {
  submitForm (){
    let data = this.item
    let url = 'item'

    if (this.item.id){
      url += '/' + this.item.id
    }

    api.post(url, data).then(res => {
      if(res.data.status === 'success'){
        this.$router.push('/item')
      }else{
        console.log(res.data.message)
      }
    }).catch(err => {
      console.log(err)
    })
  }
}
}
</script>
