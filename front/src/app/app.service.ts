import {Injectable} from '@angular/core';
import {HttpClient} from "@angular/common/http";

@Injectable({
  providedIn: 'root'
})
export class AppService {

  private serverUrl = 'http://localhost:9080/orders'

  constructor(private http: HttpClient) { }

  sendOrder(drinkType, sugars, money, extraHot) {
    return this.http.post(this.serverUrl, {
      drinkType: drinkType,
      sugars: sugars,
      money: money,
      extraHot: extraHot
    }).toPromise().then((data) => {
      return AppService.sendOrderCorrect(data);
    }, (error) => {
      return AppService.sendOrderError(error);
    });
  }

  private static sendOrderCorrect(data)
  {
    return data['message'];
  }

  private static sendOrderError(error)
  {
    return error.error['message'] + " Try again!";
  }
}
