import { createApp } from 'vue/dist/vue.esm-bundler';

import Header from './twig/components/header/Header.vue';
import Video from './twig/components/video/Video.vue';
import Accordion from './twig/components/accordion/Accordion.vue';

import './styles/styles.scss';

const app = createApp({
  components: {
    Header,
    Video,
    Accordion
  },
});

app.mount('#app');
