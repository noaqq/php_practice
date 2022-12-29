from django.conf import settings
from django.conf.urls.static import static
from django.urls import path

from . import views

urlpatterns = [
    path("", views.index, name="index"),
    path("about", views.about, name="about"),
    path("books", views.books, name="books"),
    path("libraries", views.libraries, name="libraries"),
    path("graphs", views.graphs, name="graphs"),
    path("book/all", views.rest_books, name="rest_books"),
    path("book/<int:book_id>", views.book_id, name="book_id"),
    path("library/all", views.rest_libraries, name="rest_libraries"),
    path("library/<int:library_id>", views.library_id, name="library_id"),
    path("book/<int:book_id>/delete", views.book_delete, name="book_delete"),
    path(
        "library/<int:library_id>/delete", views.library_delete, name="library_delete"
    ),
    path("pdf_list", views.pdfloaded, name="pdfloaded"),
    path("pdf_loader", views.pdfloader_site, name="pdfloader"),
]

if settings.DEBUG:
    urlpatterns += static(settings.MEDIA_URL, document_root=settings.MEDIA_ROOT)
