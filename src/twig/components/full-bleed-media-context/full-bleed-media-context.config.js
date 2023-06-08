module.exports = {
  title: 'Full Bleed Media Context',
  status: 'wip',
  context: {
    image: {
      srcset: 'https://via.placeholder.com/800x800',
      src: 'https://via.placeholder.com/400x400',
      alt: 'Test alt',
    },
    heading: 'Headline est no dicta delicatissimi. Ad per nulla mollis, sed aliquip intellegebat at, vim no dico facer minim. Nihil maiestatis ex vis. Ubique vituperatoribus.',
    paragraphs: '<p>Headline est no dicta delicatissimi. Ad per nulla mollis, sed aliquip intellegebat at, vim no dico facer minim. Nihil maiestatis ex vis. Ubique vituperatoribus et eos.</p>',
    buttons: [
      {
        button: {
          url: 'https://www.queens.edu/',
          title: 'Life at Queens',
        }
      }
    ],
  },
  variants: [
    {
      name: 'Reversed',
      context: {
        reverse: true,
      }
    },
    {
      name: 'Gold',
      context: {
        type: 'gold',
      }
    },
    {
      name: 'Gold Reversed',
      context: {
        type: 'gold',
        reverse: true,
      }
    }
  ]
}
