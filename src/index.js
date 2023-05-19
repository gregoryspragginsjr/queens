import { createApp } from 'vue/dist/vue.esm-bundler';

// import Header from './twig/components/header/Header.vue';

import './styles/styles.scss';

const emitter = mitt();
const app = createApp({
  components: {
    // Header,
  },
});

app.mount('#app');
