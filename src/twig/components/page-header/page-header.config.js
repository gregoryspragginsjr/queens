module.exports = {
  title: "Page Header",
  status: "wip",
  context: {
    heading: 'Mission, Vision, Values',
  },
  variants: [
    {
      name: "with-image",
      label: "With Image",
      context: {
        heading: 'This is Queens',
        image: {
          srcset: 'https://via.placeholder.com/760x430',
          src: 'https://via.placeholder.com/760x430',
          alt: 'Test alt',
        },
      },
    },
  ],
}
