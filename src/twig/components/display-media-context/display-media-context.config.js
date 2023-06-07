module.exports = {
  title: 'Display Media Context',
  status: 'wip',
  context: {
    image: {
      srcset: 'https://via.placeholder.com/800x800',
      src: 'https://via.placeholder.com/400x400',
      alt: 'Test alt',
    },
    icon: 'kablam',
    subheading: 'Life at Queens',
    heading: 'A day in the life of a Royal.',
    paragraphs: '<p>In short, Queens is an exciting place to be. Students and staff know each other’s names. There are plenty of on-campus events and Royals like it here so much that they take advantage of every activity we have to offer.</p>',
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
        icon: 'vase',
        reverse: true,
      }
    }
  ]
}