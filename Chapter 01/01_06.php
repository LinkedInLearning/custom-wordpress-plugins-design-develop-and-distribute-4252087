/* General Styles for Project Pages */
body.single-project {
    display: flex;
    justify-content: center;
    align-items: flex-start;
    padding: 20px;
    background-color: #f9f9f9; /* Soft light gray for the background */
    color: #222; /* High contrast dark text */
}

.opv-project-wrapper {
    width: 100%;
    max-width: 850px; /* Slightly wider for modern layout */
    margin: 0 auto;
    padding: 20px;
    background-color: #ffffff; /* Clean white background */
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    border-radius: 10px; /* Slightly rounder corners */
    box-sizing: border-box;
}

/* Single Project Page Styles */
.opv-single-project {
    padding: 25px;
    border: 1px solid #e5e5e5; /* Light border for definition */
    transition: transform 0.2s ease, box-shadow 0.2s ease; /* Hover effect */
}

.opv-single-project:hover {
    transform: translateY(-5px); /* Subtle lift */
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}

.opv-project-title {
    font-size: 2.2em;
    font-weight: bold;
    color: #0077cc; /* Strong, accessible blue */
    text-align: center;
    margin-bottom: 15px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.opv-project-content {
    font-size: 1.2em;
    line-height: 1.8;
    color: #333; /* High contrast dark gray */
    margin-bottom: 20px;
}

/* Project Details Section */
.opv-project-details p {
    font-size: 1em;
    color: #555;
    margin-bottom: 10px;
}

.opv-project-details strong {
    color: #0077cc;
}

/* Archive Styles */
.opv-projects-archive {
    padding: 20px;
    margin-top: 30px;
}

.opv-archive-title {
    font-size: 2.5em;
    color: #0077cc;
    text-align: center;
    margin-bottom: 20px;
    border-bottom: 3px solid #0056b3;
    display: inline-block;
    padding-bottom: 5px;
}

.opv-projects-list {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.opv-project-item {
    padding: 20px;
    border: 1px solid #eaeaea;
    background-color: #fafafa; /* Slightly darker background for separation */
    border-radius: 8px;
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
}

.opv-project-item:hover {
    background-color: #f0f8ff; /* Soft accessible blue hover */
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
}

.opv-project-excerpt {
    color: #444;
    font-size: 1.1em;
    line-height: 1.6;
}

/* Buttons and Links */
a,
button {
    color: #ffffff;
    background-color: #0077cc;
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 6px;
    display: inline-block;
    font-weight: bold;
    text-align: center;
    transition: background-color 0.2s ease;
}

a:hover,
button:hover {
    background-color: #0056b3;
}

/* Media Queries for Mobile Responsiveness */
@media (max-width: 768px) {
    .opv-project-title,
    .opv-archive-title {
        font-size: 1.8em;
    }

    .opv-project-content,
    .opv-project-details p {
        font-size: 1em;
    }

    .opv-project-wrapper {
        padding: 15px;
    }

    .opv-project-item {
        padding: 15px;
    }
}
