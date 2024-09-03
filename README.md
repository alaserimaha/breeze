
# StudySnap

![GitHub repo size](https://img.shields.io/github/repo-size/alaserimaha/breeze)
![GitHub contributors](https://img.shields.io/github/contributors/alaserimaha/breeze)
![GitHub stars](https://img.shields.io/github/stars/alaserimaha/breeze?style=social)
![GitHub forks](https://img.shields.io/github/forks/alaserimaha/breeze?style=social)
![GitHub issues](https://img.shields.io/github/issues/alaserimaha/breeze)

![EDUTHON Logo](https://sprint.kku.edu.sa/storage/hackathons/lm9Ad4Q36dVMcyLdRJlDqPS43eUgmY81BUjiMJq5.jpg)

Welcome to the GitHub repository of **Breez**, crafted by the **Fresh Sight** team for the **HPC** hackathon. **Breez** is a system capable of being linked to any camera. This system detects litter or trash discarded from vehicles onto the street, documents it as an infraction, and alerts the driver. Additionally, relevant authorities can access this data and generate reports on the level of waste on Saudi streets.


## Description

StudySnap aims to address the challenges students face in managing and reviewing extensive educational materials. Using AI technologies, the platform analyzes uploaded study materials and converts them into interactive review cards, summarizations, and detailed explanatory videos, making study sessions more effective and engaging.

## Features

- **Interactive Review Cards**: Automatically generate flashcards with multiple-choice or short-answer questions to help students assess their understanding.
- **Content Summarization**: Provides concise summaries of uploaded study materials to aid quick revision.
- **Detailed Explanations**: Offers video explanations and illustrative diagrams for complex topics, particularly useful in subjects like medicine and engineering.

## Installation

StudySnap consists of two main components: the app (built with Laravel) and the API (powered by Django). Below are the steps to set up the API.

### Prerequisites

Ensure you have Python installed on your machine. The project uses various Python packages, which can be installed via pip:

```bash
pip install django djangorestframework PyMuPDF nltk torch transformers scipy Pillow sentencepiece python-dotenv easyocr boto3 PyPDF2
pip install git+https://github.com/boudinfl/pke.git
python -m nltk.downloader universal_tagset
python -m spacy download en
wget https://github.com/explosion/sense2vec/releases/download/v1.0.0/s2v_reddit_2015_md.tar.gz
tar -xvf s2v_reddit_2015_md.tar.gz
pip install strsimpy flashtext openai
pip install strsim==0.0.3 six==1.16.0 networkx==3.1 numpy scikit-learn==1.2.2 unidecode==1.3 future==0.18.3 joblib==1.2.0 pytz==2022.7.1 python-dateutil==2.8.2 pandas
```

### Setting Up

1. Clone the repository:
    ```bash
    git clone https://github.com/hsndev18/study_snap.git
    ```
2. Navigate to the API directory:
    ```bash
    cd studysnap/api
    ```
3. Set up the Django environment:
    ```bash
    python manage.py migrate
    python manage.py runserver
    ```

## Usage

Once the server is running, you can access the API endpoints from your Laravel application to interact with the data processed by the Django backend.

## Language Statistics

To display language statistics as seen in many repositories (showing percentages of different programming languages used), you can utilize a GitHub Action or third-party service like Linguist which GitHub uses to perform language detection.

However, for a visual representation such as badges or charts directly in your README, services like Shields.io or GoReportCard can generate badges. GitHub does not automatically generate visual language statistics for display within the README other than through the repository insights.


## Team

![Team Photo](https://i.ibb.co/7vLZHzX/PHOTO-2024-06-23-18-31-04.jpg)

- **Mohamed Mohana** - Entrepreneurship Specialist, Team Leader
- **Fahad Al-Qahtani** - UI/UX Designer
- **Maha Assiri** - AI Developer
- **Hassan Al-Sheikh** - Full Stack Developer
- **Amjad Muhanna** - System Analyst

## Acknowledgements

Thanks to all contributors and EDUTHON organizers for the opportunity to develop this innovative solution to enhance educational experiences.
