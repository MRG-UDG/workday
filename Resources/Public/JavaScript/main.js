document.addEventListener('DOMContentLoaded', function() {
    // Function to handle job application
    function handleJobApplication(event) {
        event.preventDefault();
        const applicationLink = event.target.href;

        // You might want to add some confirmation here
        if (confirm('Are you sure you want to apply for this job?')) {
            window.open(applicationLink, '_blank');
        }
    }

    // Add click event listeners to all "Apply Now" buttons
    const applyButtons = document.querySelectorAll('.button');
    applyButtons.forEach(button => {
        button.addEventListener('click', handleJobApplication);
    });

    // Function to handle job search (if implemented)
    function handleJobSearch() {
        const searchInput = document.getElementById('job-search');
        const searchTerm = searchInput.value.toLowerCase();
        const jobListItems = document.querySelectorAll('.job-listing li');

        jobListItems.forEach(item => {
            const jobTitle = item.textContent.toLowerCase();
            if (jobTitle.includes(searchTerm)) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }
        });
    }

    // Add event listener to search input (if implemented)
    const searchInput = document.getElementById('job-search');
    if (searchInput) {
        searchInput.addEventListener('input', handleJobSearch);
    }
});
