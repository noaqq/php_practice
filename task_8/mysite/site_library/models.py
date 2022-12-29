from django.db import models


class Book(models.Model):
    name = models.CharField(max_length=100)
    author = models.CharField(max_length=100)

    def __str__(self):
        return self.name + " " + self.author


class Library(models.Model):
    name = models.CharField(max_length=100)
    address = models.CharField(max_length=100)

    def __str__(self):
        return self.name + " " + self.address


class pdfloader(models.Model):
    title = models.CharField(max_length=100)
    pdf = models.FileField(upload_to="pdfs/")
