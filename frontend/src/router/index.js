import { createRouter, createWebHistory } from 'vue-router'
import ComensalList from '../components/comensals/ComensalList.vue'
import ComensalForm from '../components/comensals/ComensalForm.vue'
import MesaList      from '../components/mesas/MesaList.vue'
import MesaForm      from '../components/mesas/MesaForm.vue'
import ReservaList   from '../components/reservas/ReservaList.vue'
import ReservaForm   from '../components/reservas/ReservaForm.vue'

const routes = [
  { path: '/comensals',       component: ComensalList },
  { path: '/comensals/create', component: ComensalForm },
  { path: '/comensals/:id/edit', component: ComensalForm, props: true },
  { path: '/mesas',           component: MesaList },
  { path: '/mesas/create',     component: MesaForm },
  { path: '/mesas/:id/edit',   component: MesaForm, props: true },
  { path: '/reservas',        component: ReservaList },
  { path: '/reservas/create',  component: ReservaForm },
  { path: '/reservas/:id/edit', component: ReservaForm, props: true },
  { path: '/', redirect: '/comensals' },
]

export default createRouter({
  history: createWebHistory(),
  routes,
})