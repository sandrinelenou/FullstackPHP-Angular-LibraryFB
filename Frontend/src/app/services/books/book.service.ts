import { Injectable } from '@angular/core';
import {HttpClient} from '@angular/common/http';
import { Observable, Subject } from 'rxjs';

import { map } from 'rxjs/operators';
import { Book } from 'src/app/models/book';


@Injectable({
  providedIn: 'root'
})
export class BookService {

  public books: Book[] = [];
  private booksUpdated = new Subject<Book[]>();
  //endpoint api
 private apiUrl = 'http://localhost/FullstackPHP-Angular-LibraryFB/Backend_PHP/api.php';


  constructor(private http: HttpClient) { }

  public getBooks():Observable<any[]>{
    return this.http.get<any[]>(this.apiUrl);    //(`${this.apiUrl}`);
  }

  public createData(data: any): Observable<any> {
    return this.http.post(this.apiUrl, data);
}

public  updateData(id: number, data: any): Observable<any> {
    return this.http.put(`${this.apiUrl}?id=${id}`, data);
}

public deleteData(id: number): Observable<any> {
    return this.http.delete(`${this.apiUrl}?id=${id}`);
}

 /*public getBooks() {
    this.http.get<{ message: string, books: any }>(this.apiUrl)
      .pipe(map((bookData) => {
        return bookData.books.map((book: { title: any; title_orig: any; id: any; date_1st_pub:any}) => {    //We already stripped out the message, but we also need to convert every post, and we will do this with the normal javascript method. This map() method can be added to any array
          return {
            title: book.title,
            title_orig: book.title_orig,
            date_1st_pub:book.date_1st_pub,
            id: book.id,

          }
        });
      }))
      .subscribe((transformedBook) => {
        this.books = transformedBook;
        this.booksUpdated.next([...this.books]);   // We also need to update our subscribe code. We just replaced the postData with transformedPost and assigned it to the this.postsa che cosa serve questa ? per fare andare avanti il progetto? come next()?
      });

  }
   //per aggiornare i posts fare subscribe di nuovo in list component????
   public getBookUpdateListener() {
    return this.booksUpdated.asObservable();
  }*/

}
