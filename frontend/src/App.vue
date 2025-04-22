<template>
  <v-app>
    <!-- Barra de navegación superior -->
    <v-app-bar app color="#8D6E63" dark>
      <v-container class="d-flex justify-center">
        <v-toolbar-title class="title">Gestión de Restaurante</v-toolbar-title>
      </v-container>
    </v-app-bar>

    <!-- Menú lateral -->
    <v-navigation-drawer app color="#FFF8E1" elevation="4">
      <v-sheet class="pa-2" color="transparent">
        <v-card
          class="mb-2"
          elevation="2"
          tile
          color="#FFE0B2"
          @click="$router.push('/comensals')"
        >
          <v-card-text class="menu-card-text">
            <v-icon left color="#5D4037">mdi-account-multiple</v-icon>
            <span class="menu-text">Comensales</span>
          </v-card-text>
        </v-card>

        <v-card
          class="mb-2"
          elevation="2"
          tile
          color="#FFE0B2"
          @click="$router.push('/reservas')"
        >
          <v-card-text class="menu-card-text">
            <v-icon left color="#5D4037">mdi-calendar</v-icon>
            <span class="menu-text">Reservas</span>
          </v-card-text>
        </v-card>

        <v-card
          class="mb-2"
          elevation="2"
          tile
          color="#FFE0B2"
          @click="$router.push('/mesas')"
        >
          <v-card-text class="menu-card-text">
            <v-icon left color="#5D4037">mdi-table-furniture</v-icon>
            <span class="menu-text">Mesas</span>
          </v-card-text>
        </v-card>
      </v-sheet>
    </v-navigation-drawer>

    <!-- Contenido principal -->
    <v-main style="background-color: #FAFAFA">
      <router-view />
    </v-main>
  </v-app>
</template>

<style>
@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap');

.title {
  font-family: 'Open Sans', sans-serif;
  font-size: 2rem;
  font-weight: 700;
  color: #FFF8E1;
  text-align: center;
}

.menu-text {
  font-family: 'Open Sans', sans-serif;
  font-weight: bold;
  color: #5D4037;
}

.menu-card-text {
  display: flex;
  align-items: center;
  gap: 8px;
}
</style>
