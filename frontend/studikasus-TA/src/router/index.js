import Vue from 'vue'
import Router from 'vue-router'
import Item from '@/components/Item'
import ItemForm from '@/components/ItemForm'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/item',
      name: 'Item',
      component: Item
    },
    {
      path: '/item/create',
      name: 'ItemCreate',
      component: ItemForm
    },
    {
      path: '/item/:id',
      name: 'ItemEdit',
      component: ItemForm
    }
  ]
})
