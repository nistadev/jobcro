import { TimeappPage } from './app.po';

describe('timeapp App', () => {
  let page: TimeappPage;

  beforeEach(() => {
    page = new TimeappPage();
  });

  it('should display message saying app works', () => {
    page.navigateTo();
    expect(page.getParagraphText()).toEqual('app works!');
  });
});
