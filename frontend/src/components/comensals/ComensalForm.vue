<template>
  <v-container class="d-flex justify-center">
    <v-card
      color="#FFF8E1"
      elevation="4"
      class="pa-4"
      width="600"
      rounded
    >
      <v-form @submit.prevent="save">
        <v-text-field v-model="form.nombre" label="Nombre" required />
        <v-text-field v-model="form.correo" label="Correo" required />
        <v-text-field v-model="form.telefono" label="Teléfono" />
        <v-text-field v-model="form.direccion" label="Dirección" />
        
        <div class="d-flex justify-end mt-4">
          <v-btn color="#5D4037" type="submit" :loading="saving" class="mr-2">
            Guardar
          </v-btn>
          <v-btn text @click="router.back()">
            Cancelar
          </v-btn>
        </div>
      </v-form>
    </v-card>
  </v-container>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import axios from '../../axios.js'

const route   = useRoute()
const router  = useRouter()
const form    = ref({ nombre: '', correo: '', telefono: '', direccion: '' })
const saving  = ref(false)

onMounted(async () => {
  if (route.params.id) {
    const { data } = await axios.get(`/comensals/${route.params.id}`)
    Object.assign(form.value, data)
  }
})

const save = async () => {
  saving.value = true
  if (route.params.id)
    await axios.put(`/comensals/${route.params.id}`, form.value)
  else
    await axios.post('/comensals', form.value)
  saving.value = false
  router.push('/comensals')
}
</script>
