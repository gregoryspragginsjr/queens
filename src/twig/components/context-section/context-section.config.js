module.exports = {
  title: "Context Section",
  status: "wip",
  context: {
    subheading: 'Welcome to Queens',
    heading: 'Where every direction leads up.',
    paragraphs: "<p>With classrooms brimming with so much experience they could double as board rooms, access to leading healthcare provider in the Carolinas a few blocks away, and sell out shows and renowned guest speakers routinely bringing all of Charlotte to QUC, there's only one thing we're missing: You.</p>",
    buttons: [
      {
        button: {
          title: 'This is Queens',
          url: 'https://www.queens.edu/',
        }
      },
    ]
  },
  variants: [
    {
      name: 'Dark',
      context: {
        type: 'dark',
      }
    },
    {
      name: 'Centered',
      context: {
        align: 'center',
        size: 'large',
        squiggle: true,
        icons: true,
      }
    },
    {
      name: 'Centered Blue',
      context: {
        type: 'blue',
        align: 'center',
        size: 'large',
        squiggle: true,
        icons: true,
      }
    },
    {
      name: 'Centered Gradient',
      context: {
        type: 'gradient',
        align: 'center',
        size: 'large',
        squiggle: true,
        icons: true,
      }
    },
  ]
}