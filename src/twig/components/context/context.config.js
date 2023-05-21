module.exports = {
  title: "Context",
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
      name: 'Centered',
      context: {
        align: 'center',
      }
    },
    {
      name: 'Centered with Squiggle',
      context: {
        align: 'center',
        squiggle: true,
      }
    },
    {
      name: 'Light',
      context: {
        type: 'light',
      }
    },
    {
      name: 'Large',
      context: {
        size: 'large',
      }
    },
    {
      name: 'Large Centered with Squiggle',
      context: {
        size: 'large',
        align: 'center',
        squiggle: true,
      }
    },
    {
      name: 'Small',
      context: {
        size: 'small',
      }
    },
    {
      name: 'Extra Small',
      context: {
        size: 'xsmall',
      }
    },
    {
      name: 'Primary Small',
      context: {
        type: 'primary',
        size: 'small',
      }
    },
    {
      name: 'Primary Extra Small',
      context: {
        type: 'primary',
        size: 'xsmall',
      }
    },
  ]
}