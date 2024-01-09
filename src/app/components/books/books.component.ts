import { Component, OnInit } from '@angular/core';
import { Subscription } from 'rxjs';
import { Book } from 'src/app/models/book';
import { BookService } from 'src/app/services/book.service';

@Component({
  selector: 'app-books',
  templateUrl: './books.component.html',
  styleUrls: ['./books.component.css']
})
export class BooksComponent implements OnInit {

  books: Book[] = [];
  private booksSub: Subscription | undefined;

  constructor(private bookService: BookService) { }

 // books: Book[] =[{"id":7,"title":"Buona Apocalisse a tutti!","title_orig":"Good Omens: The Nice and Accurate Prophecies of Agnes Nutter, Witch","date_1st_pub":"1990-05-01"},{"id":6,"title":"Guida galattica per autostoppisti","title_orig":"The Hitchhiker's Guide to the Galaxy","date_1st_pub":"1979-10-01"},{"id":5,"title":"La macchina del tempo","title_orig":"The Time Machine","date_1st_pub":"1895-01-01"},{"id":4,"title":"Il giro del mondo in 80 giorni","title_orig":"Le Tour du Monde en Quatre-Vingts Jours","date_1st_pub":"1873-01-30"},{"id":3,"title":"La Divina Commedia","title_orig":"La Divina Commedia","date_1st_pub":"1321-01-01"},{"id":2,"title":"I promessi sposi","title_orig":"I promessi sposi","date_1st_pub":"1827-01-01"},{"id":1,"title":"Il Grande Gatsby","title_orig":"The Great Gatsby","date_1st_pub":"1925-04-01"},{"id":0,"title":"Titolo Test","title_orig":"Titolo Originale Test","date_1st_pub":"1950-01-01"}]

  ngOnInit(): void {
    this. loadBooks();
  }

  loadBooks(): void {
    this.bookService.getBooks().subscribe( response => {
      console.log(response); // Log the raw response
      this.books = response;
    },
    error => {
      console.error(error);
    }
    );
       /* this.bookService.getBooks();
        //this.isLoading = true;
        this.booksSub = this.bookService.getBookUpdateListener()
          .subscribe((books: Book[]) => {
            //this.isLoading = false;
            this.books = books;
          });*/
  }


    createData(): void {
        const newData = { /* dati da inserire */ };
        this.bookService.createData(newData).subscribe(() => {
            this.loadBooks();
        });
    }

    updateData(id: number): void {
        const updatedData = { /* dati aggiornati */ };
        this.bookService.updateData(id, updatedData).subscribe(() => {
            this.loadBooks();
        });
    }

    deleteData(id: number): void {
        this.bookService.deleteData(id).subscribe(() => {
            this.loadBooks();
        });
    }


}
