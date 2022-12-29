from django.http import HttpResponse, HttpResponseRedirect
from django.shortcuts import render

from .forms import pdfloaderForm
from .graphs import get_graph
from .models import Book, Library, pdfloader


def index(request):
    return render(request, "site_library/index.html")


def about(request):
    return render(request, "site_library/about.html")


def books(request):
    context = {"books": Book.objects.all()}
    return render(request, "site_library/books.html", context)


def libraries(request):
    context = {"libraries": Library.objects.all()}
    return render(request, "site_library/libraries.html", context)


def graphs(request):
    graphs_dict = get_graph(20)
    context = {"graphs": graphs_dict}
    return render(request, "site_library/graphs.html", context)


def rest_books(request):
    books = Book.objects.all()
    books = " ".join(book.__str__() for book in books)
    return HttpResponse(books)


def book_id(request, book_id):
    book = Book.objects.get(id=book_id)
    book = book.__str__()
    return HttpResponse(book)


def rest_libraries(request):
    libraries = Library.objects.all()
    libraries = " ".join(library.__str__() for library in libraries)
    return HttpResponse(libraries)


def library_id(request, library_id):
    library = Library.objects.get(id=library_id)
    library = library.__str__()
    return HttpResponse(library)


def book_delete(request, book_id):
    book = Book.objects.get(id=book_id)
    book.delete()
    return HttpResponse("Book deleted")


def library_delete(request, library_id):
    library = Library.objects.get(id=library_id)
    library.delete()
    return HttpResponse("Library deleted")


def pdfloader_site(request):
    submitted = False
    if request.method == "POST":
        form = pdfloaderForm(request.POST, request.FILES)
        if form.is_valid():
            form.save()
            return HttpResponseRedirect("/pdf_loader?submitted=True")
    else:
        form = pdfloaderForm
        if "submitted" in request.GET:
            submitted = True
    return render(
        request, "site_library/pdf_loader.html", {"form": form, "submitted": submitted}
    )


def pdfloaded(request):
    context = {"pdfs": pdfloader.objects.all()}
    return render(request, "site_library/pdf_list.html", context)
