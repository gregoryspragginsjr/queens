module.exports = {
  title: 'Media Context',
  status: 'wip',
  context: {
    image: {
      srcset: 'https://via.placeholder.com/660x370',
      src: 'https://via.placeholder.com/660x370',
      alt: 'Test alt',
    },
    subheading: 'Life at Queens',
    heading: 'Campus check.',
    paragraphs: "<p>Our historic campus is surrounded by trees and charm. There’s no shortage of green, which contributes to the generally serene and calming baseline level of energy we have.</p><p>Students also have easy access to Charlotte for a change of scenery, trip to a museum, concert, sports game, or anything in between.</p>",
    buttons: [
      {
        button: {
          url: 'https://www.queens.edu/',
          title: 'Campus Experience',
        }
      }
    ],
  },
  variants: [
    {
      name: 'Reverse',
      context: {
        reverse: true,
      }
    },
    {
      name: 'Dark',
      context: {
        type: 'dark',
      }
    },
    {
      name: 'With Video',
      context: {
        video: {
          id: '86jwyC1kFDk',
        },
      }
    },
  ]
}