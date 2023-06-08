module.exports = {
  title: 'Article',
  status: 'wip',
  context: {
    image: {
      srcset: 'https://via.placeholder.com/660x470',
      src: 'https://via.placeholder.com/660x470',
      alt: 'Test alt',
    },
    size: 'small',
    squiggle: true,
    heading: 'Internships',
    paragraphs: '<p>We know that students and young professionals with internship experience are 35% more likely to get at least one job offer after graduating than those without it (source: zippia.com). So, we provide the resources to ensure that every Royal has the opportunity to intern.</p>'
  },
  variants: [
    {
      name: 'XSmall',
      context: {
        size: 'xsmall',
        squiggle: false,
        break: 'condensed',
        heading: 'Casino Night',
        paragraphs: '<p>Baby needs a new textbook! You won’t want to miss this fun-filled night of fancy attire, food, music, dancing—and of course, casino games.</p>',
        buttons: [
          {
            button: {
              title: 'Read More',
              url: 'https://www.queens.edu/',
            }
          },
        ]
      },
    },
    {
      name: 'Primary XSmall',
      context: {
        type: 'primary',
        size: 'xsmall',
        squiggle: false,
        heading: 'Queens Students Vie For $5k In Cash Prizes At 5th Annual Pitch Competition',
        paragraphs: '<p>Inspired by the hit reality show “Shark Tank,” three finalists spent seven grueling minutes pitching their hearts out at the 5th Annual Pitch...</p>',
        buttons: [
          {
            button: {
              title: 'Read More',
              url: 'https://www.queens.edu/',
            }
          },
        ]
      }
    }
  ]
}