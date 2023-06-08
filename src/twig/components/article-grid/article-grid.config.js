module.exports = {
  title: "Article Grid",
  status: "wip",
  context: {
    size: 'xsmall',
    break: 'condensed',
    items: [
      {
        image: {
          srcset: 'https://via.placeholder.com/660x470',
          src: 'https://via.placeholder.com/660x470',
          alt: 'Test alt',
        },
        heading: 'Blair College of Health',
        paragraphs: '<p>We don’t take the responsibility of creating healthcare professionals lightly. To stay ahead of the curve, we offer eight comprehensive healthcare programs in addition to our Presbyterian School of Nursing, as well as MHA and MSN graduate programs.</p>',
        buttons: [
          {
            button: {
              title: 'Read More',
              url: 'https://www.queens.edu/',
            }
          },
        ]
      },
      {
        image: {
          srcset: 'https://via.placeholder.com/660x470',
          src: 'https://via.placeholder.com/660x470',
          alt: 'Test alt',
        },
        heading: 'Cato School of Education',
        paragraphs: '<p>Teachers have the power to change student trajectories, to mold minds—the Cato School of Education is home to these ambitious lifelong learners. In addition to undergrad, this school offers three graduate programs. 100% of Cato grads were offered a job before graduation.</p>',
        buttons: [
          {
            button: {
              title: 'Read More',
              url: 'https://www.queens.edu/',
            }
          },
        ]
      },
      {
        image: {
          srcset: 'https://via.placeholder.com/660x470',
          src: 'https://via.placeholder.com/660x470',
          alt: 'Test alt',
        },
        heading: 'Knight School of Communication',
        paragraphs: '<p>Whether you’re a future go-getter journalist, a PR powerhouse, or a working professional looking to step up their strategic communication—this is the place for you. When you choose Knight, your story is guaranteed to be a successful one.</p>',
        buttons: [
          {
            button: {
              title: 'Read More',
              url: 'https://www.queens.edu/',
            }
          },
        ]
      },
      {
        image: {
          srcset: 'https://via.placeholder.com/660x470',
          src: 'https://via.placeholder.com/660x470',
          alt: 'Test alt',
        },
        heading: 'McColl School of Business',
        paragraphs: "<p>Based in the #2 financial hub in the country, in classrooms that could double as board rooms (based on the resumes of your instructors and classmates alike)—you'll create unmatched connections and grow your network. All in a city rich with career opportunities. Whether you're pursuing a bachelor's or an MBA, McColl undoubtedly means business.</p>",
        buttons: [
          {
            button: {
              title: 'Read More',
              url: 'https://www.queens.edu/',
            }
          },
        ]
      },
      {
        image: {
          srcset: 'https://via.placeholder.com/660x470',
          src: 'https://via.placeholder.com/660x470',
          alt: 'Test alt',
        },
        heading: 'College of Arts & Sciences',
        paragraphs: '<p>At the College of Arts & Sciences, you’ll find the widest range of majors spanning from music to biochemistry to legal. This college is the great connector between arts, sciences, and humanities led by award-winning faculty mentors with 100% of undergrads employed within 12 months.</p>',
        buttons: [
          {
            button: {
              title: 'Read More',
              url: 'https://www.queens.edu/',
            }
          },
        ]
      },
      {
        image: {
          srcset: 'https://via.placeholder.com/660x470',
          src: 'https://via.placeholder.com/660x470',
          alt: 'Test alt',
        },
        heading: 'Presbyterian School of Nursing',
        paragraphs: '<p>Royals graduating from this program had 100% job placement within 9 months of graduating—and are in close proximity to two of the state’s leading healthcare systems, in addition to our award-winning facility, The Hunt Nursing Simulation Center. Direct admission is available.</p>',
        buttons: [
          {
            button: {
              title: 'Read More',
              url: 'https://www.queens.edu/',
            }
          },
        ]
      },
    ]
  },
  variants: [
    {
      name: 'Bordered',
      context: {
        border: true,
      }
    },
    {
      name: 'Squiggle Bordered',
      context: {
        squiggle: true,
        border: true,
      }
    },
    {
      name: 'Blue Bordered',
      context: {
        border: true,
        type: 'blue',
      }
    },
    {
      name: 'Primary Bordered',
      context: {
        border: true,
        type: 'primary',
      }
    },
    {
      name: 'Staggered',
      context: {
        columns: 'staggered',
        break: 'default',
        squiggle: true,
        items: [
          {
            image: {
              srcset: 'https://via.placeholder.com/660x470',
              src: 'https://via.placeholder.com/660x470',
              alt: 'Test alt',
            },
            heading: 'Internships',
            paragraphs: '<p>We know that students and young professionals with internship experience are 35% more likely to get at least one job offer after graduating than those without it (source: zippia.com). So, we provide the resources to ensure that every Royal has the opportunity to intern.</p>'
          },
          {
            image: {
              srcset: 'https://via.placeholder.com/660x470',
              src: 'https://via.placeholder.com/660x470',
              alt: 'Test alt',
            },
            heading: 'Careers',
            paragraphs: '<p>Many big-name companies and organizations like Deloitte, Google, Atrium Health, and more are eager to work with Queens grads. You’ll work with our Vandiver Career Center from day one to make a plan and progress on your career goals.</p>'
          },
        ]
      }
    },
    {
      name: 'Staggered Reverse',
      context: {
        columns: 'staggered',
        break: 'default',
        reverse: true,
        squiggle: true,
        items: [
          {
            image: {
              srcset: 'https://via.placeholder.com/660x470',
              src: 'https://via.placeholder.com/660x470',
              alt: 'Test alt',
            },
            heading: 'Internships',
            paragraphs: '<p>We know that students and young professionals with internship experience are 35% more likely to get at least one job offer after graduating than those without it (source: zippia.com). So, we provide the resources to ensure that every Royal has the opportunity to intern.</p>'
          },
          {
            image: {
              srcset: 'https://via.placeholder.com/660x470',
              src: 'https://via.placeholder.com/660x470',
              alt: 'Test alt',
            },
            heading: 'Careers',
            paragraphs: '<p>Many big-name companies and organizations like Deloitte, Google, Atrium Health, and more are eager to work with Queens grads. You’ll work with our Vandiver Career Center from day one to make a plan and progress on your career goals.</p>'
          },
        ]
      }
    }
  ]
}