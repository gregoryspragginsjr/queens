import { createApp } from 'vue/dist/vue.esm-bundler';

import Header from './twig/components/header/Header.vue';
import Video from './twig/components/video/Video.vue';
import Accordion from './twig/components/accordion/Accordion.vue';
import Directory from './twig/components/02-pages/Directory.vue';

// Animated
import Context from './twig/components/context/Context.vue';
import ButtonGroup from './twig/components/button-group/ButtonGroup.vue';
import Article from './twig/components/article/Article.vue';
import MediaContext from './twig/components/media-context/MediaContext.vue';

import './styles/styles.scss';

const app = createApp({
  components: {
    Header,
    Video,
    Accordion,
    Context,
    ButtonGroup,
    Article,
    MediaContext,
    Directory,
  },
});

app.mount('#app');
