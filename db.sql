CREATE DATABASE IF NOT EXISTS db;
USE db;

CREATE TABLE IF NOT EXISTS `course` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `type` VARCHAR(100) NOT NULL,
  `field` VARCHAR(100) NOT NULL,
  `related_skills` TEXT NOT NULL,
  `date` DATE NOT NULL,
  `lecturer` VARCHAR(255) NOT NULL,
  `rate` FLOAT DEFAULT 0,
  `descriptions` TEXT NOT NULL,
  `price` DECIMAL(10, 2) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO
  `course` (
    `name`,
    `type`,
    `field`,
    `related_skills`,
    `date`,
    `lecturer`,
    `rate`,
    `descriptions`,
    `price`
  )
VALUES
  (
    'Web Development Fundamentals',
    'Online',
    'Computer Science',
    'HTML, CSS, JavaScript',
    '2024-07-10',
    'Prof. Alice White',
    4.2,
    'Learn the basics of web development with practical examples.',
    199.99
  ),
  (
    'Data Visualization with Python',
    'In-Person',
    'Data Science',
    'Python, Data Visualization, Matplotlib',
    '2024-08-15',
    'Dr. David Clark',
    4.7,
    'A hands-on course on creating effective data visualizations using Python.',
    349.99
  ),
  (
    'Introduction to Cybersecurity',
    'Online',
    'Information Security',
    'Cybersecurity, Risk Management',
    '2024-09-05',
    'Dr. Linda Adams',
    4.4,
    'An introduction to the fundamentals of cybersecurity and risk management.',
    299.99
  ),
  (
    'Blockchain Basics',
    'Online',
    'Finance',
    'Blockchain, Cryptocurrency',
    '2024-10-01',
    'Mr. Michael Lee',
    4.6,
    'Understanding the basics of blockchain technology and cryptocurrencies.',
    249.99
  ),
  (
    'Advanced SQL Techniques',
    'In-Person',
    'Database Management',
    'SQL, Data Analysis',
    '2024-11-20',
    'Dr. Sarah Johnson',
    4.9,
    'Advanced techniques in SQL for data analysis and management.',
    399.99
  );



CREATE TABLE IF NOT EXISTS `event` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `field` VARCHAR(100) NOT NULL,
  `type` VARCHAR(100) NOT NULL,
  `related_skills` TEXT NOT NULL,
  `date` DATE NOT NULL,
  `topic` VARCHAR(255) NOT NULL,
  `speaker` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
);


INSERT INTO `event` (
  `name`,
  `field`,
  `type`,
  `related_skills`,
  `date`,
  `topic`,
  `speaker`
) VALUES
  (
    'AI and Machine Learning Summit',
    'Technology',
    'Summit',
    'AI, Machine Learning, Data Science',
    '2024-12-15',
    'The Future of AI and Machine Learning',
    'Dr. Robert Green'
  ),
  (
    'Big Data Conference',
    'Data Science',
    'Conference',
    'Big Data, Analytics',
    '2024-11-25',
    'Leveraging Big Data for Business Insights',
    'Ms. Julia Scott'
  ),
  (
    'Cloud Computing Workshop',
    'Cloud Technology',
    'Workshop',
    'Cloud Services, AWS, Azure',
    '2024-10-10',
    'Hands-on with Cloud Computing Platforms',
    'Mr. Steven Wright'
  ),
  (
    'Digital Marketing Bootcamp',
    'Marketing',
    'Bootcamp',
    'SEO, SEM, Content Marketing',
    '2024-09-30',
    'Mastering Digital Marketing Strategies',
    'Dr. Emily Davis'
  ),
  (
    'Tech Startups Meetup',
    'Entrepreneurship',
    'Meetup',
    'Startups, Innovation, Entrepreneurship',
    '2024-08-25',
    'Innovations in Tech Startups',
    'Ms. Natalie Lewis'
  );
