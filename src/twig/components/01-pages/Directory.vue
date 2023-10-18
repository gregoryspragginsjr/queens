<template>
  <div class="directory">
    <div class="directory__inner grid">
      <div class="directory__search-filter">
        <form class="directory__search search-form">
          <label for="search-input" class="sr-only">Search Directory</label>
          <input v-model="searchInput" type="search" id="search-input" class="search-form__input" name="search-input" placeholder="Search Directory" />
          <button type="button" class="search-form__submit">
            <svg class="fill-current icon icon--sm" viewBox="0 0 12.8 12.8">
              <path d="M4.8 1.6C3 1.6 1.6 3 1.6 4.8 1.6 6.6 3 8 4.8 8 6.6 8 8 6.6 8 4.8 8 3 6.6 1.6 4.8 1.6zM0 4.8C0 2.1 2.1 0 4.8 0s4.8 2.1 4.8 4.8c0 1-.3 2-.9 2.8l3.9 3.9c.3.3.3.8 0 1.1-.3.3-.8.3-1.1 0L7.6 8.7c-.8.6-1.8.9-2.8.9C2.1 9.6 0 7.5 0 4.8z" />
            </svg>
            <span class="sr-only">Search</span>
          </button>
        </form>

        <div class="directory__cat-filters">
          <div class="filter-select-wrap">
            <select v-model="selectedGroup" class="filter-select" id="select-type">
              <option value="">Personnel Type</option>
              <option v-for="group in groupOptions" :key="group" :value="group">{{ group }}</option>
            </select>
          </div>

          <div class="filter-select-wrap">
            <select v-model="selectedDepartment" class="filter-select" id="select-department">
              <option value="">Department</option>
              <option v-for="department in departmentOptions.sort()" :key="department" :value="department">{{ department }}</option>
            </select>
          </div>
        </div>
      </div>

      <div class="directory__name-filters name-filters">
        <div class="name-filters__label">Jump to</div>

        <div class="name-filters__nav">
          <button v-for="letter in alphabet" :key="letter" @click="filterByLetter(letter)">{{ letter }}</button>
        </div>
      </div>
  
      <div class="directory__tool-bar">
        <p class="directory__search-results-heading">{{ filteredItems.length }} People Match Your Selections</p>

        <div class="directory__tool-bar-actions">
          <button type="button" class="form-clear-btn" @click="clearSelections">Clear Selections</button>
        </div>
      </div>
    </div>

    <div class="directory__inner grid">
      <div class="directory__section-marker">
        <div class="directory__section-marker-text">{{ selectedLetter }}</div>
      </div>

      <div class="directory__listing">
        <div v-for="(item, index) in filteredItems" :key="index" class="directory__listing-item">
          <article class="person-post">
            <div class="person-post__text">
              <h3 class="person-post__heading">{{ item.first_name && item.last_name ? item.last_name + ', ' + item.first_name : item.last_name }}</h3>
              <div class="person-post__details">
                <div v-if="item.title" class="person-post__title">{{ item.title }}</div>
                <div v-if="item.dept" class="person-post__dept">{{ item.dept }}</div>

                <div class="person-post__contact">
                  <div v-if="item.phone" class="person-post__phone">
                    <div class="icon-text icon-text--center">
                      <svg class="fill-current icon icon--sm" viewBox="0 0 24 24">
                        <path d="M2.4 3.6a1.2 1.2 0 0 1 1.2-1.2h2.583a1.2 1.2 0 0 1 1.184 1.003l.887 5.323a1.2 1.2 0 0 1-.647 1.27l-1.857.93a13.244 13.244 0 0 0 7.325 7.324l.929-1.857a1.2 1.2 0 0 1 1.27-.647l5.323.887a1.2 1.2 0 0 1 1.003 1.184V20.4a1.2 1.2 0 0 1-1.2 1.2H18C9.384 21.6 2.4 14.615 2.4 6V3.6Z" />
                      </svg>
                      <a :href="`tel:${item.phone}`">{{ item.phone }}</a>
                    </div>
                  </div>

                  <div v-if="item.email" class="person-post__email">
                    <div class="icon-text icon-text--center">
                      <svg class="fill-current icon icon--sm" viewBox="0 0 21 20">
                        <path d="M2.503 5.884L10.5 9.882L18.497 5.884C18.4674 5.37444 18.2441 4.89549 17.8728 4.54523C17.5016 4.19497 17.0104 3.99991 16.5 4H4.5C3.98958 3.99991 3.49845 4.19497 3.12718 4.54523C2.75591 4.89549 2.5326 5.37444 2.503 5.884Z" />
                        <path d="M18.5 8.118L10.5 12.118L2.5 8.118V14C2.5 14.5304 2.71071 15.0391 3.08579 15.4142C3.46086 15.7893 3.96957 16 4.5 16H16.5C17.0304 16 17.5391 15.7893 17.9142 15.4142C18.2893 15.0391 18.5 14.5304 18.5 14V8.118Z" />
                      </svg>
                      <a :href="`mailto:${item.email}`">{{ item.email }}</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div v-if="item.image.src" class="person-post__image">
              <img :src="item.image.src" class="w-full object-cover" :alt="item.image.alt">
            </div>
          </article>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Fuse from 'fuse.js';
import { XMLParser } from 'fast-xml-parser';

export default {
  data() {
    return {
      alphabet: ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'],
      items: [],
      departmentOptions: [],
      groupOptions: [],
      fuse: null,
      searchInput: '',
      selectedGroup: '',
      selectedDepartment: '',
      selectedLetter: '',
    };
  },
  computed: {
    filteredItems() {
      let filtered = this.items;

      if (this.searchInput) {
        const results = this.fuse.search(this.searchInput);
        filtered = results.map((result) => result.item);
      }

      if (this.selectedGroup !== '' && this.selectedGroup !== 'All') {
        filtered = filtered.filter(item => item.group === this.selectedGroup);
      }

      if (this.selectedDepartment !== '' && this.selectedDepartment !== 'All') {
        filtered = filtered.filter(item => item.dept === this.selectedDepartment);
      }

      if (this.selectedLetter) {
        filtered = filtered.filter(item => item.last_name.charAt(0).toUpperCase() === this.selectedLetter);
      }

      return filtered;
    },
    searchResultsCount() {
      return this.filteredItems.length;
    },
  },
  created() {
    this.fetchXMLData()
    .then(() => {
      this.initializeFuse();
    });
  },
  methods: {
    async fetchXMLData() {
      try {
        const response = await fetch('https://web02.queens.edu/campusDir2/campusdirectory.xml');
        const xmlData = await response.text();
        const options = {
          ignoreAttributes: false,
          attributeNamePrefix: "_"
        };
        const parser = new XMLParser(options);
        const jObj = parser.parse(xmlData);

        if (jObj.members) {
          const members = jObj.members.member;
          const items = members.map(member => ({
            id: member._id,
            first_name: member.first_name,
            last_name: member.last_name,
            title: member.title,
            dept: member.dept,
            group: member.group,
            phone: member.phone,
            email: member.email,
            image: {
              src: '',
              alt: '',
            },
          }));

          const uniqueDepartments = new Set(items.map(item => item.dept).filter(dept => dept.trim() !== ''));
          this.departmentOptions = ['All', ...uniqueDepartments];

          const uniqueGroups = new Set(items.map(item => item.group));
          this.groupOptions = ['All', ...uniqueGroups];

          this.items = items;
        } else {
          console.warn('No member data found in XML.');
        }
      } catch (error) {
        console.error('Error fetching XML data:', error);
      }
    },
    initializeFuse() {
      this.fuse = new Fuse(this.items, {
        keys: ['first_name', 'last_name', 'dept'],
        threshold: 0.3,
        minMatchCharLength: 2,
      });
    },
    filterByLetter(letter) {
      this.selectedLetter = letter;
    },
    clearSelections() {
      this.searchInput = '';
      this.selectedGroup = '';
      this.selectedDepartment = '';
      this.selectedLetter = '';
    },
  },
};
</script>
