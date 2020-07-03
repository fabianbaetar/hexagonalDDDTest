import {Component} from '@angular/core';
import {HttpClient} from "@angular/common/http";
import {AppService} from "./app.service";

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  providers: [AppService],
  styleUrls: ['./app.component.scss']
})
export class AppComponent {
  title = 'coffee-machine';
  drinkType;
  sugars;
  extraHot;
  money;
  terminalMessage;

  constructor(private http: HttpClient, private appService: AppService) {
    this.initValues()
  }

  initValues() {
    this.drinkType = '';
    this.sugars = -1;
    this.extraHot = -1;
    this.money = 0;
    this.terminalMessage = 'Order!!';
  }

  async onOrderClick() {
    this.terminalMessage = await this.appService.sendOrder(this.drinkType, this.sugars, this.money, this.extraHot);
  }

  onClearClick() {
    this.initValues();
  }
}
