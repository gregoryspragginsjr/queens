import { createApp } from 'vue/dist/vue.esm-bundler';

import Header from './twig/components/header/Header.vue';
import Alert from './twig/components/alert/Alert.vue';
import Video from './twig/components/video/Video.vue';
import Accordion from './twig/components/accordion/Accordion.vue';

// Animated
import Context from './twig/components/context/Context.vue';
import ButtonGroup from './twig/components/button-group/ButtonGroup.vue';
import Article from './twig/components/article/Article.vue';
import MediaContext from './twig/components/media-context/MediaContext.vue';
import ContextSection from './twig/components/context-section/ContextSection.vue';
import StaggeredMediaContextGrid from './twig/components/staggered-media-context-grid/StaggeredMediaContextGrid.vue';
import PageHeader from './twig/components/page-header/PageHeader.vue';

import './styles/styles.scss';

const app = createApp({
  components: {
    Header,
    Alert,
    Video,
    Accordion,
    Context,
    ButtonGroup,
    Article,
    MediaContext,
    ContextSection,
    StaggeredMediaContextGrid,
    PageHeader
  },
});

app.mount('#app');
